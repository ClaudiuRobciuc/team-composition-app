NAME=caseclaudiu

docker build --target prod -t $NAME .
docker tag $NAME claudiurbc/$NAME
docker push claudiurbc/$NAME:latest