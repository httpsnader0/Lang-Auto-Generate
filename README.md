# Language Auto Generate

This Command Generate All Files In Lang Folder To Json File And Make Auto Generate If Any File Changed .

## Installation

- Copy TransLangToJs.php To Your Project At
```bash
App/Console/Commands
```

- Open vite.config.js Then At The Top Of File Add

```bash
import { exec } from "node:child_process";
```

- And At The End Of Plugins Add

```bash
{
    name: "lang",
    enforce: "post",
    handleHotUpdate({ server, file }) {
        if (file.includes("/lang/")) {
            exec(
                "php artisan lang:run",
                (error, stdout) =>
                    error === null &&
                    console.log(`Lang Generated Successfully !`)
            );
        }
    },
},
```

- Congratulations You Have Now Auto Generated For Lang Folder

## Links

* [LinkedIn](https://www.linkedin.com/in/a-mohamed-nader/)
* [Whatsapp](https://wa.me/+201098683990)
* [Facebook](https://www.facebook.com/httpsnader0)
* [Instagram](https://www.instagram.com/httpsnader0)
