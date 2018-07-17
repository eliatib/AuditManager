#!C:/Python27

from twisted.web.server import Site
from twisted.web.server import NOT_DONE_YET
from twisted.web.resource import Resource
from twisted.internet import reactor, ssl
import json
import nmap

class API(Resource):
    def __init__(self):
        self.token = "34095ut0935ug9q8t9q8tfidfjoisdf"

    def deal_with_header(self, request):
        request.setHeader('Access-Control-Allow-Origin', '*')
        request.setHeader('Access-Control-Allow-Methods', 'GET, POST, OPTION')
        request.setHeader('Access-Control-Allow-Headers', 'x-prototype-version, x-requested-with, content-type')
        request.setHeader('Access-Control-Max-Age', 2520) # 42 hours
        request.setHeader('Content-type', 'application/json')
        return request

    def render_GET(self, request):
        request = self.deal_with_header(request)
        request.write('')
        request.finish()
        return NOT_DONE_YET

    def render_OPTIONS(self, request):
        request = self.deal_with_header(request)
        request.write('')
        request.finish()
        return NOT_DONE_YET
    

    def render_POST(self, request):
        request = self.deal_with_header(request)
        data = json.loads(request.content.read())
        results = dict()
        if data['token'] == self.token:
            results['token_status'] = "ok"
        else:
            results['token_status'] = "wrong"

        if data['action'] == "nmap":
            if data['token'] == self.token:
                nm = nmap.PortScanner()
                results["nmap"]= nm.scan(hosts=data['hosts'], arguments=data['arguments'])
        
        return(json.dumps(results))


root = Resource()
root.putChild("api", API())
factory = Site(root)
reactor.listenSSL(8800, factory, ssl.DefaultOpenSSLContextFactory(privateKeyFileName = 'C:/wamp64/bin/apache/apache2.4.23/conf/key/private.key', certificateFileName = 'C:/wamp64/bin/apache/apache2.4.23/conf/key/certificate.crt'))
#reactor.listenTCP(8800, factory)

reactor.run()
