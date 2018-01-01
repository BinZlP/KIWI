var data_map=new Array(2000);
for(q=0;q<2000;q++)
  data_map[q]=new Array(2000);
for(xn=0;xn<2000;xn++)
  for(yn=0;yn<2000;yn++)
      data_map[yn][xn]="green";
for(xn=0;xn<2000;xn++)
  for(zn=0;zn<10;zn++)
  {
    data_map[zn][xn]="#424242";
    data_map[xn][zn]="#424242";
  }
data_map[19][10]="darkgray";
data_map[24][19]="gray";
data_map[20][1930]="white";
