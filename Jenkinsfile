pipeline {
    agent any
    
    stages {
        stage('Sonar Analysis') {
            steps {
                echo 'test hook..'
                sh 'cd /var/www/html && sudo docker run  --rm -e SONAR_HOST_URL="http://34.125.247.253:9000" -e SONAR_LOGIN="sqp_f59cee4ee229a6ed6f4509473a443b60d08ef16e"  -v ".:/usr/src" sonarsource/sonar-scanner-cli -Dsonar.projectKey=ge'      
            }
        }


        stage('Build LMS') {
            steps {
                script{
                    echo 'Building..'               
                }                
            }
        }

        stage('Release LMS') {
            steps {
                script {
                    echo "Releasing.."                         
            }
            }
        }

        stage('Deploy LMS') {
            steps {
                script {
                    echo "Deploying.."  
                    sh 'cd /var/www/html && sudo git pull origin master'                    
            }
            }
        }

    }
}
