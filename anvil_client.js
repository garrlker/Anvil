var request = require('request');
var exec = require("child_process").exec;

var projectUUID = "088b2f50-6596-11e7-92ab-292662e1f152";//Please place your Project's UUID here
var websiteURL  = "http://ec2-34-211-205-8.us-west-2.compute.amazonaws.com"

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
    request(String(websiteURL) + '/api/ping/' + String(projectUUID), function (error, response, body) {
        var data = JSON.parse(body);
        //console.log('beat');
        if(data['command'] == 'pull'){
            pull(data['file_path'],data['repo_url']);
            request(String(websiteURL) + '/api/setToIdle/' + String(projectUUID));
        }else if(data['command'] == 'clone'){
            clone(data['file_path'],data['repo_url']);
            request(String(websiteURL) + '/api/setToIdle/' + String(projectUUID));
        }
    });
}, 5000);