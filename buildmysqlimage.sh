NAME=casemysql

docker build -t $NAME ./mysql
docker tag $NAME claudiurbc/$NAME
docker push claudiurbc/$NAME:latest