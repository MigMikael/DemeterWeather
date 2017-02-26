import serial
import time

ser = serial.Serial("/dev/ttyACM0", 115200)
file = open("/home/pi/Documents/canet/soil_moisture_data.txt", "w")

round = 0
sum = 0

while round < 10:
	round = round + 1
	data = ser.readline()		
	value = float(data) / 40.95
	sum  = sum + value

sum = sum / 10
print("%.2f" % sum)	
