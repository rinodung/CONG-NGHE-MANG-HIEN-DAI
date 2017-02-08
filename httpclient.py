#!/usr/bin/env python

import httplib
import sys
import Cookie

#get http server ip
http_server = sys.argv[1]
#create a connection
conn = httplib.HTTPConnection(http_server)

#custom header
headers = {
            "Accept":"text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8",
            "Accept-Language": "en-US,en;q=0.8,vi;q=0.6",
            "Accept-Encoding": "gzip, deflate, sdch, br",
            "User-Agent": "httpclient-python",
            "Connection": "keep-alive",
            "Cache-Control":"max-age=0",
            "Cookie": "password=fe01ce2a7fbac8fafaed7c982a04e229; username=demo; PHPSESSID=5urqs6hkqbq5sr5gie80pvlse4",
            }

while 1:
    cmd = raw_input('input command (ex. GET index.html): ')
    cmd = cmd.split()

    if cmd[0] == 'exit': #tipe exit to end it
        break
    

    #request command to server
    conn.request(cmd[0], cmd[1], "", headers)

    #get response from server
    rsp = conn.getresponse()
    
    #print server response and data
    print(rsp.status, rsp.reason)
    data_received = rsp.read()
    print(data_received)
    
conn.close()
