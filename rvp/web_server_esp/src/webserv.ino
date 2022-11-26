/*
 *  This sketch demonstrates how to scan WiFi networks.
 *  The API is almost the same as with the WiFi Shield library,
 *  the most obvious difference being the different file you need to include:
 */
#include "WiFi.h"
#include <SPIFFS.h>
#include <ESPAsyncWebServer.h>
#include <DHT.h>
#include <stdio.h>

const char* ssid = "A1-521A2D_RPT";
const char* password = "xoyezo1806";

const int led5Pin = 5;
const int led12Pin = 12;

const int dhtPin = 26;

DHT dhtSensor(dhtPin, DHT22);

float humidity;
float temperature;

AsyncWebServer server(80);

void setup() {
    Serial.begin(115200);

    pinMode(led5Pin, OUTPUT);
    pinMode(led12Pin, OUTPUT);

    digitalWrite(led5Pin, HIGH);
    digitalWrite(led12Pin, HIGH);

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

    server.on("/", HTTP_GET, [](AsyncWebServerRequest *req) {
        req->send(SPIFFS, "/index.html", String(), false);
    });

    server.on("/script.js", HTTP_GET, [](AsyncWebServerRequest *req) {
        req->send(SPIFFS, "/script.js", "text/javascript");
    });

    server.on("/5/on", HTTP_POST, [](AsyncWebServerRequest *req) {
        digitalWrite(led5Pin, HIGH);
    });

    server.on("/5/off", HTTP_POST, [](AsyncWebServerRequest *req) {
        digitalWrite(led5Pin, LOW);
    });

    server.on("/12/on", HTTP_POST, [](AsyncWebServerRequest *req) {
        digitalWrite(led12Pin, HIGH);
    });

    server.on("/12/off", HTTP_POST, [](AsyncWebServerRequest *req) {
        digitalWrite(led12Pin, LOW);
    });

    server.begin();
}

char tempBuf[100];
char humBuf[100];

void loop() {
    temperature = dhtSensor.readTemperature();
    humidity = dhtSensor.readHumidity();

    Serial.print("Temperature: ");
    Serial.print(temperature);
    Serial.println("C");

    Serial.print("Humidity: ");
    Serial.println(humidity);

    sprintf(tempBuf, "%f", temperature);
    sprintf(humBuf, "%f", humidity);

    server.on("/temp", HTTP_GET, [](AsyncWebServerRequest *req) {
        req->send(200, "text/plain", tempBuf);
    });

    server.on("/hum", HTTP_GET, [](AsyncWebServerRequest *req) {
        req->send(200, "text/plain", humBuf);
    });

    delay(5000);
}