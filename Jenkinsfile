pipeline {
    agent any
    
    stages {
        stage('Sonar Analysis') {
            steps {
                echo 'test hook..'
                echo 'test'
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
                    sh 'cd /var/www/html && git pull origin master'                    
            }
            }
        }

    }
}
