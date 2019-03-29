module.exports = {
	srcDir: "./src",
	dstDir: "./public/app/themes/obsidian/assets",
	styles: {
		srcDir: "./src/css",
		src: "main.scss",
		dstDir: "./public/app/themes/obsidian/assets/css",
		prefixBrowsers: ["last 2 versions", "> 2%"]
	},
	scripts: {
		srcDir: "./src/js",
		src: "**/*.js",
		dstDir: "./public/app/themes/obsidian/assets/js",
		babelPreset: "@babel/preset-env",
		bundleName: "bundle",
		requires: []
	},
	images: {
		srcDir: "./src/images",
		dstDir: "./public/app/themes/obsidian/assets/images"
	},
	translate: {
		srcDir: "./src/theme/",
		dstDir: "./public/app/themes/obsidian/languages"
	},
	otherFiles: [
		// examples:
		// "./src/fonts/**/*",
		// {
		//   origPath: ["node_modules/optinout.js/dist/optinout.js"],
		//   path: "web/app/themes/efs/assets/libs/"
		// },
		// {
		//   origPath: ["node_modules/optinout.js/dist/optinout.js"],
		//   base: "node_modules/optinout.js",
		//   path: "web/app/themes/efs/assets/libs/"
		// }
	]
};
