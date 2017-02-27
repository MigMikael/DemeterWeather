import picamera

camera = picamera.PiCamera()

camera.capture('/var/www/html/DemeterWeather/public/original_image.jpg')
