import cv2

imagePath = "/var/www/html/DemeterWeather/public/original_image.jpg"
image = cv2.imread(imagePath)

gray_image = cv2.cvtColor(image, cv2.COLOR_BGR2GRAY)

cv2.imwrite("/var/www/html/DemeterWeather/public/process_image.jpg", gray_image)
