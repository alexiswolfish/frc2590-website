/*
Jim Harris
3/22/13
Cool Interactive Design
Uses the golden spiral parametric equation to make a galaxy like design that gets bigger the farther the mouse is from the center of the screen.
*/

//Declare and initialize some variables.
float x = 0;
float y = 0;
float lastX = 0;
float lastY = 0;
float lastMouseX;
float lastMouseY;
double increment = .05;
int[][] starCoords;
int timer;

static final float e = 2.71828;
float r;
float a = .5;
float b = .5;
int max = 10;
int min = -10;
float pRad;
float pAngle;
float mAngle;
boolean firstRun = true;

//PFont tmr = createFont("Times New Roman", 10, true);


//Sets up all of the initial values for the screen and stroke properties.
void setup(){
 increment = .05;
 starCoords = new int[(int)(100/increment+1)][2];
 //textFont(tmr, 25);
 timer = 0;
 size(767, 370);
 background(0);
 stroke(255);
 strokeWeight(1);
 frameRate(125);
 a = abs(sqrt(pow(mouseX - width/2, 2)+ pow(mouseY - height/2, 2)))/25;
 b = .038;
 
}

void draw(){
 //redraw the background.
 background(0);
 
 if(firstRun){
   for(float i = 0; i < 100; i+=increment){
      r = pow(e, i*b) * a;
      x = (r*cos(i));
      y = (r*sin(i));
      pRad = sqrt((x*x) + (y*y));
      if(x != 0)pAngle = atan((float)(y/x));
      if(x < 0){ pAngle += PI;}
      else if(x == 0 && y < 0){ pAngle = -PI/2;}
      else if(x == 0 && y > 0){ pAngle = PI/2;}
      if(width/2 - mouseX != 0)mAngle = atan( (float)(height/2 - mouseY) / (float)(width/2 - mouseX) );
      if(width/2 - mouseX < 0){ mAngle += PI;}
      else if(width/2 - mouseX == 0 && height/2 - mouseY < 0){mAngle = -PI/2;}
      else if(width/2 - mouseX == 0 && height/2 - mouseY > 0){mAngle = PI/2;}
      if(mAngle < 0) mAngle += 2*PI;
      x = pRad * cos(mAngle - pAngle) + width/2;
      y = pRad * sin(mAngle - pAngle) + height/2;
      starCoords[(int)(i/increment)][0] = (int)(x+(int)(random(min, max)));
      starCoords[(int)(i/increment)][1] = (int)(y+(int)(random(min, max)));
      firstRun = false;
   }
 }
 
 strokeWeight(40);
 stroke(255, 0, 0);
 point(width/2, height/2);
 //The polar equation for the golden spiral is r=a*e^(theta*b). I noticed that a really nice looking spiral emerges if b is set to .04. I set a equal to the distance the mouse is away from the center of the screen divided by 25. This makes it so that the spiral can be made bigger or smaller by the user.
 a = abs(sqrt(pow(mouseX - width/2, 2)+ pow(mouseY - height/2, 2)))/25;
 //Smaller b = tighter circle
 b = .038;
 //If a gets too small the image looks really crappy so I put a limit on it.
 if(a <= 3) a = 3;
  //Starts a for loop that draws all of the points in the spiral. This will draw some 2000 points.
  for(float i = 0; i < 100; i+=increment){
  //On the line below you can see the original polar equation for spiral.
  r = pow(e, i*b) * a;
  //Ok I had this really cool polar equation, so you may be asking yourself what this nonsense is below. Well, I cannot actually use a polar equation, and since the spiral is not a function I need to convert it into a parametric equation where both x and y are functions of parameter T which in this case will be substituted for i because that is being uniformly incremented with each new point.
  //In trigonometry x = radius*cosine(angle). In polar equations converted into parametric ones angle theta is the same thing as T or i in this case. So i is basically an angle that is being incremented.
  //y is basically the same thing but with sines instead of cosine.
  x = (r*cos(i));
  y = (r*sin(i));
  //Gets the difference that the point is away from the center of the screen or the origin.
  pRad = sqrt((x*x) + (y*y));
  //Cannot divide by 0 so this is a fail safe to prevent a crash. If x is not 0 it will get the angle between the origin and the point.
  if(x != 0)pAngle = atan((float)(y/x));
  //The range of atan is only (-PI/2, PI/2) so if x is negative the angle will be incorrect (atan(-y/x) = atan(y/-x) (see the problem here?)) If x is negative PI is added to the angle.
  if(x < 0){ pAngle += PI;}
  //If x is 0 and y is less than 0 or if y is greater than 0 it will set the angle.
  else if(x == 0 && y < 0){ pAngle = -PI/2;}
  else if(x == 0 && y > 0){ pAngle = PI/2;}
  //Basically does the same thing I just did to get the point's angle but for the mouse pointer instead.
  if(width/2 - mouseX != 0)mAngle = atan( (float)(height/2 - mouseY) / (float)(width/2 - mouseX) );
  if(width/2 - mouseX < 0){ mAngle += PI;}
  else if(width/2 - mouseX == 0 && height/2 - mouseY < 0){mAngle = -PI/2;}
  else if(width/2 - mouseX == 0 && height/2 - mouseY > 0){mAngle = PI/2;}
  if(mAngle < 0) mAngle += 2*PI;
  //Sets the x and y values of the point.
  x = pRad * cos(mAngle - pAngle) + width/2;
  y = pRad * sin(mAngle - pAngle) + height/2;
  //I set the stroke weight and color. The color value decreases as i increases to give it a fade effect.  
  strokeWeight(6);
  stroke(255 - 2.25*i, 0, 0);
  //draws the point.
  point(x, y);
  
  if(i != 0) line(x, y, lastX, lastY);
  //text("0", x, y);
  lastX = x;
  lastY = y;
  //Changes the stroke properties and draws a smaller point at a random place around the larger point to make it look like stars are twinkling.
  strokeWeight(1);
  stroke(255, 255, 255);
  if(mouseX != lastMouseX || mouseY != lastMouseY || firstRun){
    starCoords[(int)(i/increment)][0] = (int)(x+(int)(random(min, max)));
    starCoords[(int)(i/increment)][1] = (int)(y+(int)(random(min, max)));
    firstRun = false;
  }
  point(starCoords[(int)(i/increment)][0], starCoords[(int)(i/increment)][1]);
  if(timer >= 5){
    lastMouseX = mouseX;
    lastMouseY = mouseY;
    timer = 0;
  }
  }
  timer++;
}
