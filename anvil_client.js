var request = require('request');
var exec = require("child_process").exec;

var projectUUID = "e38fb980-64fe-11e7-8099-45c41694352d";//Please place your Project's UUID here


function test(path){
    exec('ls', {cwd: path}, function(error, stdout) {
        console.log('stdout: ' + stdout);
    });
}

function pull(path, repo_url){
    exec('git clone ' + String(repo_url), {cwd: path}, function(error, stdout) {
        console.log('stdout: ' + stdout);
        console.log('git clone ' + String(repo_url));
    });
}





//Every 5 seconds if command == 'pull' then pull the repo to the file path
setInterval( function() {
    request('http://anv.il/api/ping/' + String(projectUUID), function (error, response, body) {
        var data = JSON.parse(body);
        console.log(data);
        if(data['command'] == 'pull'){
            pull(data['file_path'],data['repo_url']);
            request('http://anv.il/api/setToIdle/e38fb980-64fe-11e7-8099-45c41694352d');
        }
    });
}, 15000);