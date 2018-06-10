const http = require('http');

http.createServer(onRequest).listen(8888);
console.log('testestestsetestest');

function onRequest(req,res) {
  res.writeHead(200);
  res.write('test');
  res.end();
}
