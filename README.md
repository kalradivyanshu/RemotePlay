# RemotePlay

Remote Play is a simple project that lets you play songs wirelessly on any speaker which is connected to a Raspberry Pi.

How it works:

A PHP code running on local host lets anyone upload a song to the server, (since it is on local network, upload speed is high), then a python code running on Raspberry Pi plays this via the Raspberry's mp3 jack. Then when the music ends, the python program sends a request to PHP, to delete the song, so that the server doesnt get overloaded.
