curl -X POST -u onos:rocks --header "Content-Type: application/json" --header "Accept: application/json" -d '{
		"priority": 10,
		"timeout": 0,
		"isPermanent": true,
		"deviceId": "of:0000000000000002",
		"treatment": {
			"instructions": [
			{
				"type": "OUTPUT",
				"port": "3"
			}
			]
		},
		"selector":{
			"criteria": [
			{
				"type": "IN_PORT",
				"port": "2"
			}
			]
		}
}' "http://127.0.0.1:8181/onos/v1/flows/of%3A0000000000000002" --user karaf:karaf


curl -X POST -u onos:rocks --header "Content-Type: application/json" --header "Accept: application/json" -d '{
		"priority": 10,
		"timeout": 0,
		"isPermanent": true,
		"deviceId": "of:0000000000000002",
		"treatment": {
			"instructions": [
			{
				"type": "OUTPUT",
				"port": "2"
			}
			]
		},
		"selector": {
			"criteria": [
			{
				"type": "IN_PORT",
				"port": "3"
			}
			]
		}
}' "http://127.0.0.1:8181/onos/v1/flows/of%3A0000000000000002" --user karaf:karaf

curl -X PORT -u onos:rocks --header "Content-Type: application/json" --header "Accept: application/json" -d '{
		"priority": 10,
		"timeout": 0,
		"isPermanent": true,
		"deviceId": "of:0000000000000005",
		"treatment": {
			"instructions": [
			{
				"type": "OUTPUT",
				"port": "3"
			}
			]
		},
		"selector": {
			"criteria": [
			{
				"type": "IN_PORT",
				"port": "2"
			}
			]

		}
}' "http://127.0.0.1:8181/onos/v1/flows/of%3A0000000000000005" --user karaf:karaf


curl -X POST -u onos:rocks --header "Content-Type: application/json" --header "Accept: application/json" -d '{
		"priority": 10,
		"timeout": 0,
		"isPermanent": true,
		"deviceId": "of:0000000000000005",
		"treatment": {
			"instructions": [
			{
				"type": "OUTPUT",
				"port": "2"
			}
			]
		},
		"selector": {
			"criteria": [
			{
				"type": "IN_PORT",
				"port": "3"
			}
			]
		}
}' "http://127.0.0.1:8181/onos/v1/flows/of%3A0000000000000005" --user karaf:karaf
