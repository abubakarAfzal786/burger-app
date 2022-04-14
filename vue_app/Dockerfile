FROM node:12-alpine
WORKDIR /app

RUN yarn global add @vue/cli
RUN yarn global add serve

COPY . /app

ENV PATH /app/node_modules/.bin:$PATH

RUN yarn

RUN yarn build

CMD ["serve", "-p", "3000", "-s", "dist"]