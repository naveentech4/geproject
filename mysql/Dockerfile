FROM mysql:latest

# set root password
ENV MYSQL_ROOT_PASSWORD=1234

# create database and table
COPY electives.sql /docker-entrypoint-initdb.d/

# set permissions for root user
RUN echo "GRANT ALL PRIVILEGES ON *.* TO 'root'@'%' WITH GRANT OPTION;" >> /docker-entrypoint-initdb.d/electives.sql

EXPOSE 3306
CMD ["mysqld"]

