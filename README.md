[![SensioLabsInsight](https://insight.sensiolabs.com/projects/f7b6a32f-d21d-450d-b916-7d99b1c78070/big.png)](https://insight.sensiolabs.com/projects/f7b6a32f-d21d-450d-b916-7d99b1c78070)



# Standalone image optimization tool for jpg and png 
Tool finds images in given location, and compress / resize them.

### Why ?
Sometimes when you have images uploaded by users, you can  figure out that they  are simply too big. And  if there is too many then downlaoding form ftp, resizing, uploading ftp can be very time consumig. 
And simple  anwser - becouse i can :D

### How it's work
1. It search for images of specific size in given directory  structure. 
2. Image compresion - it works on [tinypng.com](https://tinypng.com/dashboard/developers) service, and you need to obtain api key from tinypng.  It's free (for 500 imges / month). You can get about 50% size decrese of  normal images, without any visible lose.
3. Image  resize - based on intervention/image. It simply can resize  big  images.

### How is it  look 
![Image tool](https://github.com/poznet/bigimages/blob/master/doc/screenshoot.JPG)


### Installation 
Instalation idea is  to make  it as simple as it can be.
- via composer

  run `composer install`

And just enter on installed path.

### What is it made of ...
- symfony/finder
- symfony/http-foundation
- tinify/tinivy
- twig/twig
- intervention/image

Code is  bugged and simple. Idea behind this - was to create something relative small, that's  why there is no framework behind.