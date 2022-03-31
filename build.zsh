echo enter version: 
read version
full_version=v000.000."$version"
echo version: "$full_version"
echo stopping container...
docker stop item_carousel
echo removing container...
docker rm -f item_carousel
docker build -t item_carousel:"$full_version" ./
docker run -d -p 9000:80 --name item_carousel item_carousel:"$full_version"
echo item_carousel:"$full_version" deployed