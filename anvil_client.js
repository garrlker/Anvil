var request = require('request');
var exec = require("child_process").exec;

var projectUUID = "c184acc0-6531-11e7-af46-4b4fe6c5dd10";//Please place your Project's UUID here


function test(path){
    exec('ls', {cwd: path}, function(error, stdout) {
        console.log('stdout: ' + stdout);
    });
}

function clone(path, repo_url){
    exec('git clone ' + String(repo_url), {cwd: path}, function(error, stdout) {
        console.log('stdout: ' + stdout);
        console.log('git clone ' + String(repo_url));
    });
}

function pull(path, repo_url){
    exec('git pull ' + String(repo_url), {cwd: path}, function(error, stdout) {
        console.log('stdout: ' + stdout);
        console.log('git pull ' + String(repo_url));
    });
}





//Every 5 seconds check command and act accordingly
setInterval( function() {
    request('http://anv.il/api/ping/' + String(projectUUID), function (error, response, body) {
        var data = JSON.parse(body);
        //console.log(data);
        if(data['command'] == 'pull'){
            pull(data['file_path'],data['repo_url']);
            request('http://anv.il/api/setToIdle/' + String(projectUUID));
        }else if(data['command'] == 'clone'){
            clone(data['file_path'],data['repo_url']);
            request('http://anv.il/api/setToIdle/' + String(projectUUID));
        }
    });
}, 5000);