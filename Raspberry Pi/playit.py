import json
import urllib2
import os
while 1:
	url = "http://192.168.1.2/music/"
	response = urllib2.urlopen(url+"getnext.php")
	json_data = json.loads(response.read())
	if json_data['id'] != "empty":
		musicurl = url+json_data['url']
		musicid = json_data['id']
		os.system("omxplayer -o local "+musicurl)
		print(url+"deleteit.php?id="+musicid)
		response = urllib2.urlopen(url+"deleteit.php?id="+musicid)
		string = response.read()
		print(string)