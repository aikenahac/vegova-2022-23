#include <Arduino.h>
#include "WiFi.h"
#include <SPIFFS.h>
#include <ESPAsyncWebServer.h>
#include <DHT.h>
#include <stdio.h>
#include <string>

const char* ssid = "Aiken’s iPhone";
const char* password = "makima123";

const int humidifier = 5;
const int heater = 12;

float default_hyst = 2;
float default_temp = 24;
float default_hum = 50;

float temp_hyst = default_hyst;
float hum_hyst = default_hyst;
float wanted_temp = default_temp;
float wanted_hum = default_hum;

const int dhtPin = 26;

DHT dhtSensor(dhtPin, DHT22);

float humidity;
float temperature;

AsyncWebServer server(80);

char tempBuf[100];
char humBuf[100];

unsigned long currentTime = millis();
unsigned long prevTime = currentTime - 5000;

void autoHeater(float currentTemp);
void autoHumidifier(float currentTemp);

void setup() {
    Serial.begin(115200);

    pinMode(humidifier, OUTPUT);
    pinMode(heater, OUTPUT);

    digitalWrite(humidifier, HIGH);
    digitalWrite(heater, HIGH);

    dhtSensor.begin();

    delay(10);

    Serial.println();
    Serial.println();
    Serial.print("Connecting to ");

    if (!SPIFFS.begin(true)) {
        Serial.println("An error has occured when initializing SPIFFS");
        return;
    }

    Serial.println(ssid);

    WiFi.begin(ssid, password);
    while (WiFi.status() != WL_CONNECTED) {
        delay(500);
        Serial.print(".");
    }

    Serial.println("");
    Serial.println("WiFi connected.");

    Serial.println("IP address: ");
    Serial.println(WiFi.localIP());

    // Humidifier
    server.on("/humidifier/on", HTTP_POST, [](AsyncWebServerRequest *req) {
        digitalWrite(humidifier, HIGH);
    });

    server.on("/humidifier/off", HTTP_POST, [](AsyncWebServerRequest *req) {
        digitalWrite(humidifier, LOW);
    });

    server.on("/humidifier", HTTP_GET, [](AsyncWebServerRequest *req) {
        req->send(200, "text/plain", humBuf);
    });

    server.on("/humidifier/set-hyst", HTTP_GET, [](AsyncWebServerRequest *request) {
        if (request->hasParam("value"))
            hum_hyst = atoi(request->getParam("value")->value().c_str());

        request->send(200);
    });

    server.on("/humidifier/set-wanted-value", HTTP_GET, [](AsyncWebServerRequest *request) {
        if (request->hasParam("value"))
            wanted_hum = atoi(request->getParam("value")->value().c_str());

        request->send(200);
    });

    // Heater
    server.on("/heater/on", HTTP_POST, [](AsyncWebServerRequest *req) {
        digitalWrite(heater, HIGH);
    });

    server.on("/heater/off", HTTP_POST, [](AsyncWebServerRequest *req) {
        digitalWrite(heater, LOW);
    });

    server.on("/heater", HTTP_GET, [](AsyncWebServerRequest *req) {
        req->send(200, "text/plain", tempBuf);
    });

    server.on("/heater/set-hyst", HTTP_GET, [](AsyncWebServerRequest *request) {
        if (request->hasParam("value"))
            temp_hyst = atoi(request->getParam("value")->value().c_str());

        request->send(200);
    });

    server.on("/heater/set-wanted-value", HTTP_GET, [](AsyncWebServerRequest *request) {
        if (request->hasParam("value"))
            wanted_temp = atoi(request->getParam("value")->value().c_str());

        request->send(200);
    });

    // Current states
    server.on("/dehumidifier/state", HTTP_GET, [](AsyncWebServerRequest *request) {
        if (digitalRead(humidifier))
            request->send(200, "text/plain", "ON");
        else
            request->send(200, "text/plain", "OFF");
    });

    server.on("/heater/state", HTTP_GET, [](AsyncWebServerRequest *request) {
        if (digitalRead(heater))
            request->send(200, "text/plain", "ON");
        else
            request->send(200, "text/plain", "OFF");
    });

    server.on("/slider/states", HTTP_GET, [](AsyncWebServerRequest *request) {
        String data = "{\"temp_slider\":" + String(wanted_temp, 0) + ",\"temp_hyst\":" + String(temp_hyst, 0) + ",\"hum_slider\":" + String(wanted_hum, 0) + ",\"hum_hyst\":" + String(hum_hyst, 0) + "}";

        request->send(200, "text/plain", data);
    });

    server.serveStatic("/", SPIFFS, "/").setDefaultFile("index.html");

    server.begin();
}

void loop() {
    currentTime = millis();

    temperature = dhtSensor.readTemperature();
    humidity = dhtSensor.readHumidity();

    Serial.print("Temperature: ");
    Serial.print(temperature);
    Serial.println("C");

    Serial.print("Humidity: ");
    Serial.println(humidity);

    sprintf(tempBuf, "%f", temperature);
    sprintf(humBuf, "%f", humidity);

    Serial.println(humBuf);

    if (currentTime - prevTime > 5000) {
        temperature = dhtSensor.readTemperature();
        humidity = dhtSensor.readHumidity();

        autoHeater(temperature);
        autoHumidifier(humidity);

        sprintf(humBuf, "%f", humidity);
        sprintf(tempBuf, "%f", temperature);

        prevTime = currentTime;

        Serial.println(tempBuf);
        Serial.println(humBuf);
    }

    delay(5000);
}

void autoHeater(float currentTemp) {
    if (currentTemp <= wanted_temp) {
        digitalWrite(heater, HIGH);
        Serial.println("Turning off heater");
    }

    if (currentTemp >= wanted_temp + temp_hyst) {
        digitalWrite(heater, LOW);
        Serial.println("Turning on heater");
    }
}

void autoHumidifier(float currentHum) {
    if (currentHum <= wanted_hum) {
        digitalWrite(humidifier, LOW);
        Serial.println("Turning off humidifier");
    }

    if (currentHum >= wanted_hum + hum_hyst) {
        digitalWrite(humidifier, HIGH);
        Serial.println("Turning on humidifier");
    }
}