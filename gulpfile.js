const gulp = require("gulp");
const sass = require("gulp-sass");
const concat = require("gulp-concat");
const uglify = require("gulp-uglify");
const autoprefixer = require("gulp-autoprefixer");
const path = require("path");
const plumber = require("gulp-plumber");
const babel = require("gulp-babel");
const merge = require("merge-stream");
const sourcemaps = require("gulp-sourcemaps");

const srcDir = "./src";
const assetsConfig = require("./src/assets.json");

const makeStylesheetsBundle = bundleConfig => {
	const sourcePath = path.join(srcDir, bundleConfig.source);

	return gulp
		.src(sourcePath, { base: path.dirname(sourcePath) })
		.pipe(plumber())
		.pipe(sourcemaps.init())
		.pipe(
			sass({
				includePaths: ["node_modules", path.dirname(sourcePath)],
				...bundleConfig.sass
			})
		)
		.pipe(autoprefixer(bundleConfig.prefixer))
		.pipe(sourcemaps.write())
		.pipe(gulp.dest(bundleConfig.destination));
};

const makeScriptsBundle = bundleConfig => {
	let bundleSourcePaths = bundleConfig.source.map(p => path.join(srcDir, p));

	if (bundleConfig.dependencies) {
		bundleSourcePaths = [...bundleConfig.dependencies, ...bundleSourcePaths];
	}

	return (task = gulp
		.src(bundleSourcePaths)
		.pipe(plumber())
		.pipe(sourcemaps.init())
		.pipe(
			babel({
				...bundleConfig.babel
			})
		)
		.pipe(concat(`${bundleConfig.name}.js`))
		.pipe(uglify())
		.pipe(sourcemaps.write())
		.pipe(gulp.dest(bundleConfig.destination)));
};

const stylesheets = () => {
	const tasks = merge();
	assetsConfig.stylesheets.forEach(bundleConfig => {
		tasks.add(makeStylesheetsBundle(bundleConfig));
	});

	return tasks;
};

const scripts = () => {
	const tasks = merge();
	assetsConfig.scripts.forEach(bundleConfig => {
		tasks.add(makeScriptsBundle(bundleConfig));
	});

	return tasks;
};

gulp.task("build", gulp.parallel(stylesheets, scripts));
gulp.task(
	"develop",
	gulp.series("build", () => {
		gulp.watch(`${srcDir}/**/*.scss`, stylesheets);
		gulp.watch(`${srcDir}/**/*.js`, scripts);
	})
);

gulp.task("default", gulp.parallel("develop"));
