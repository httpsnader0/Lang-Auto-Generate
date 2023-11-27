# Language Auto Generate

This Command Generate All Files In Lang Folder To Json File And Make Auto Generate If Any File Changed .

## Installation

- Copy TransLangToJs.php To Your Project At
```bash
app/Console/Commands
```

- Open vite.config.js Then At End Of Plugins Add
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

## Thanks For Your Watching
