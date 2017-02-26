import numpy as np
import cv2
import time

cap = cv2.VideoCapture(0)

ret, frame = cap.read()

gray = cv2.cvtColor(frame, cv2.COLOR_BGN2GRAY)

cv2.imwrite('process_image.jpg', gray)

time.sleep(5)