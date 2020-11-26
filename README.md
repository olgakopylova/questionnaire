# questionnaire
Install via docker

1. Install docker
https://docs.docker.com/get-docker/

2. Clone docker-compose ready to this project by run command
```bash
git clone https://github.com/olgakopylova/questionnaire_docker.git
```

3. Get official mysql docker image by run command
```bash
docker pull mysql
```

4. Go to the folder questionnare_docker

5. Change
- path to project folder in file web/Dockerfile (line 16)
- path to project folder in file docker-compose.yml (line 15)

6. Get project by run command
```bash
git clone https://github.com/olgakopylova/questionnaire.git
```

6. Up docker containers by command
```bash
docker-compose up -d
```

7. Enter to the web conteiner by command
```bash
docker exec -it questionnaire_docker_web_1 bash
```

8. Init DB by run command
```bash
php db_init.php
```

9. Open browser and go to localhost:8080

Install via local server

1. Install local server (MAMP, Denver, OpenServer, etc.) with PHP 7.2, Apache, MySQL

2. Get project by run command (put it in destination domain folder)
```bash
git clone https://github.com/olgakopylova/questionnaire.git
```

4. Change DB connection param to your own in file class/DB.php (lines 5-7)

5. Init DB by run command
php db_init.php

6. Open browser and go to domainname.local (as example) 
