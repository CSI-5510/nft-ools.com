echo enter name: 
read name
echo enter version:
read version
full_version=v"$version"
echo version: "$full_version"
echo stopping container...
docker stop "$name"
echo removing container...
docker rm -f "$name"
docker build -t "$name":"$full_version" ./
docker run -d -p 9000:80 --name "$name" "$name":"$full_version"
echo "$name":"$full_version" deployed