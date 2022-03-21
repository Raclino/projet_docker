FROM node:10.19.0 AS build-step
WORKDIR /app
COPY my_base_front/package.json ./
RUN npm install
COPY my_base_front .
RUN npm run build

FROM nginx:1.12-alpine
COPY --from=build-step /app/build /usr/share/nginx/html
EXPOSE 80