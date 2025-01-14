program StdDataProgram;
uses
  crt;
var
  StdCode : array[1..5] of String[11];
  StdName : array[1..5] of String[50];
  StdSex : array[1..5] of Char;
  StdAge : array[1..5] of Integer;
  lenName, lenGender, lenAge : Integer;
  maxlenName, maxlenGender : Integer;
  i, j : Integer;
  st1,st2 : String;
  st3 : Integer;
begin
  for i:= 1 to 5 do
  begin
    ClrScr;
    WriteLn('Round : ',i);
    Write('Input Student Code : ');
    ReadLn(StdCode[i]);
    Write('Input Student Name : ');
    ReadLn(StdName[i]);
    Write('Input Student Gender : ');
    ReadLn(StdSex[i]);
    Write('Input Student Age : ');
    ReadLn(StdAge[i]);
  end;

  for i:= 1 to 5 do
  begin
    st1 := StdName[i];
    st2 := StdSex[i];
    st3 := StdAge[i];
    lenName := Length(st1);
    lenGender := Length(st2);
    lenAge := 2;
    if maxlenName < lenName then
    begin
      maxlenName := lenName;
    end;
    if maxlenGender < lenGender then
    begin
      maxlenGender := lenGender;
    end;
  end;

  WriteLn('+-----------------------------------------------+');
  Write('|  Code         ');
  Write('Name');
  for j:= 1 to maxlenName do
    Write(' ');
  Write('Gender');
  for j:= 1 to maxlenGender do
    Write(' ');
  WriteLn('Age |');
  for i:= 1 to 5 do
    begin
      Write('|  ',StdCode[i],'  ');
      Write(StdName[i]);
      for j:= 1 to 7 do
        Write(' ');
      Write(StdSex[i]);
      for j:= 1 to maxlenGender do
        Write('    ');
      WriteLn(StdAge[i], ' | ');
    end;
  WriteLn('+-----------------------------------------------+');
  // for i:= 1 to 5 do
  // begin
  //   WriteLn('Show Data Round : ',i);
  //   WriteLn('Student Code   : ',StdCode[i]);
  //   WriteLn('Student Name   : ',StdName[i]);
  //   WriteLn('Student Gender : ',StdSex[i]);
  //   WriteLn('Student Age    : ',StdAge[i]);
  // end;
end.