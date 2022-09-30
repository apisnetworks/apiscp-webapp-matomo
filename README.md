# Matomo Web App

This is a native module for Matomo on ApisCP. Native modules are shipped with ApisCP
and require little changes to work. 

## Getting started

```bash
cd /usr/local/apnscp
mkdir -p config/custom/webapps
git clone https://github.com/apisnetworks/apiscp-webapp-matomo config/custom/webapps/matomo
./composer dump-autoload -o
cpcmd webapp:refresh-apps
```

**Happy coding!**

## License
All code within this repository has been relicensed under MIT by Apis Networks, INC.

