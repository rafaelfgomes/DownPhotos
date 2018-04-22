var gulp = require('gulp');
var uncss = require('gulp-uncss');
 
gulp.task('uncss', function() {
  return gulp.src([
  	'public/css/app.css'
  	])
  .pipe(uncss({
      html: [
        'http://downphotos.dev/',
		'http://downphotos.com/sobre',
		'http://downphotos.com/time',
		'http://downphotos.com/usuario',
		'http://downphotos.com/envio'
      ],
    })).pipe(gulp.dest('new/'));
});

