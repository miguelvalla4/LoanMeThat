FROM node:latest

WORKDIR /www

COPY package*.json ./

RUN npm install

COPY . .

EXPOSE 8087

CMD ["node", "index"]