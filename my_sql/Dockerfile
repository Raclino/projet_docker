# Derived from official mysql image (our base image)
FROM mysql:8.0 as builder

ADD setup.sql /docker-entrypoint-initdb.d/script.sql
RUN chmod -R 775 /docker-entrypoint-initdb.d
# Add a database
ENV MYSQL_ROOT_PASSWORD root
# Add the content of the sql-scripts/ directory to your image
# All scripts in docker-entrypoint-initdb.d/ are automatically
# executed during container startup