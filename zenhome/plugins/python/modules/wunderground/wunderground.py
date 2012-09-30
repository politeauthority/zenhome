import urllib
import xml.dom.minidom

class WUnderground(object):
    def __init__(self,api_key):
        self.api_key = api_key
    def get_current_weather(self,state,city):
        w_request = urllib.urlopen('http://api.wunderground.com/api/%(api_key)s/conditions/q/%(state)s/%(city)s.xml'%{'api_key':self.api_key,'state':state,'city':city})
        w_xml = xml.dom.minidom.parse(w_request)
        response = w_xml.getElementsByTagName('response')[0]
        obs_location = response.getElementsByTagName('observation_location')[0]
        return_dict = {
            'obs_latitude':str(obs_location.getElementsByTagName('latitude')[0].firstChild.nodeValue),
            'obs_longitude':str(obs_location.getElementsByTagName('longitude')[0].firstChild.nodeValue),
            'weather':str(response.getElementsByTagName('weather')[0].firstChild.nodeValue),
            'temp_f':str(response.getElementsByTagName('temp_f')[0].firstChild.nodeValue),
            'temp_c':str(response.getElementsByTagName('temp_c')[0].firstChild.nodeValue),
            'rel_humidity':str(response.getElementsByTagName('relative_humidity')[0].firstChild.nodeValue),
            'wind_direction':str(response.getElementsByTagName('wind_dir')[0].firstChild.nodeValue),
            'wind_mph':str(response.getElementsByTagName('wind_mph')[0].firstChild.nodeValue),
            'pressure_in':str(response.getElementsByTagName('pressure_in')[0].firstChild.nodeValue),
            'pressure_trend':str(response.getElementsByTagName('pressure_trend')[0].firstChild.nodeValue)
            }
        print return_dict
