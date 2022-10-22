# Docker LAMP ready to use environment

<br>

> MYSQL is still pending to add to docker-compose, you can add it manually

<br>

## What is this?
This is a Docker php serverless LAMP (MySQL still pending to be added), this is ready to use, just download, execute docker compose instructions and you are ready to code!

You can choose from various types of frameworks or php standalone versions

<br>

## How to use it?
First of all, clone the repository:

```bash
git clone https://github.com/cobasesp/docker-lamp.git
```

<br>

Once you cloned the repository, you can change the branch in order to use one of the prepared frameworks:

* Lumen 8
* Slim 4.3
* PHP standalone

<br>

```bash
git checkout slim-framework
```

```bash
git checkout lumen-framework
```

```bash
git checkout standalone
```

<br>

Now, you can start to build you docker image and start using docker run to start you image and start to work

```bash
docker-compose up --build
```

Now you can enter `http:://localhost` to see the main url and start to code!

<br>

>Don't forget to change the remote repository url in order to be able to upload you commits to you own repository

<br>

### Enjoy!