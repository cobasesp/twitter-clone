# Docker Alpine PHP + MySQL ready to use environment

<br>

## What is this?
This is a Docker php serverless, this is ready to use, just download, execute docker compose instructions and you are ready to code!

You can choose from lumen framework or php standalone versions

<br>

## How to use it?
First of all, clone the repository:

```bash
git clone https://github.com/cobasesp/docker-lamp.git
```

Once you cloned the repository, you can change the branch in order to use one of the prepared frameworks:

* Lumen 8
* PHP standalone

<br>

```bash
git checkout lumen-framework
```

```bash
git checkout standalone
```

<br>

Now, you can start to build you docker image and start using docker run to start you image and start to work

```bash
docker build -t alpine-php-mysql .
```

>If you want to put another name to the image, remmember to change it in the docker-compose file

Now you can enter `http:://localhost` to see the main url and start to code!

<br>

>Don't forget to change the remote repository url in order to be able to upload you commits to you own repository

<br>

### Enjoy!