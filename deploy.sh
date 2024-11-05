INIT_FILE = "/Users/POLYCUBE6/Desktop/INTRA/.test"
CONFIG_PATH= "/Users/POLYCUBE6/Desktop/INTRA/docker-compose.yml"

if [ ! -f $INIT_FILE]; then
  echo "First time DB start!!"
  sudo docker-compose -f $CONFIG_PATH up -d mysql
  touch $INIT_FILE
fi

sudo docker-compose -f $CONFIG_PATH -d --no-deps www

sudo docker image prune -af