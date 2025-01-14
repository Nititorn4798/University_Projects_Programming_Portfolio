program repeat1;
uses
  crt;
var
  Code : String[11];
  Name : String[50];
  Age : Integer;
  Sex, Stat : Char;
  pref, sexf, statf : String[20];
  line : String = '-----------------------------------------------------------------------------';
  LenName, LenPref, LenSexF : Integer;
  i, x : Integer;
  isExit : Boolean;

begin

  ClrScr;
  repeat
    Write('Input Your Code [11] :::> ');
    ReadLn(Code);
    if Length(Code) = 11 then
    begin
      Break;
    end
    else
      WriteLn('Out of range.');
  until (False);

  repeat
    Write('Input Your Name :::> ');
    ReadLn(Name);
    if Length(Name) > 0 then
    begin
      Break;
    end
    else
      WriteLn('Out of range.');
  until (False);

  repeat
    Write('Input Your Age :::> ');
    ReadLn(Age);
    if (age >= 1) and (age <= 120) then
    begin
      Break;
    end
    else
      WriteLn('Out of range.');
  until (False);

  repeat
    Write('Input Your Sex [M/F/H] :::> ');
    ReadLn(Sex);
    case (UpCase(Sex)) Of
      'M' : isExit := True;
      'F' : isExit := True;
      'H' : isExit := True;
      else
        WriteLn('Out of range.');
        isExit := False;
    end;
  until (isExit);

  repeat
    Write('Input Your Status [S/M/D/R] :::> ');
    ReadLn(Stat);
    case (UpCase(Stat)) Of
      'S','M','D','R' : isExit := True;
      else
        WriteLn('Out of range.');
        isExit := False;
    end;
  until (isExit);

  if (Sex = 'm') or (Sex = 'M') then
  begin
    pref := 'Mr. ';
    sexf := 'Male';
  end
  else
  begin
    if UpCase(Sex) = 'H' then
      begin
        pref := '';
        sexf := 'LGBTQ';
      end
      else
      begin
        pref := 'Ms. ';
        sexf := 'FeMale';
      end;
  end;

  case (Stat) of
    'S','s' : statf := 'Single';
    'M','m' : statf := 'Married';
    'D','d' : statf := 'Divorce';
    'R','r' : statf := 'Pass away';
    else
      statf := 'Not specified';
  end;

  ClrScr;
  WriteLn('Code   : ',Code);
  Write  ('Name   : '); Write(pref); WriteLn(Name);
  WriteLn('Age    : ',Age);
  WriteLn('Sex    : ',sexf);
  WriteLn('Status : ',statf);
  WriteLn('');
  WriteLn('');
  WriteLn('');
  
  LenName := Length(Name);
  LenPref := Length(pref);
  LenName := LenName + LenPref;
  LenSexF := Length(sexf);
  x := LenSexF;

  WriteLn(line);
  Write('Code');
  for i := 0 to 11 do
    Write(' ');
  Write('Name');
  for i := 0 to LenName do
    Write(' ');
  Write('Age');
  Write('    ');
  Write('Sex');
  for i := 0 to x do
    Write(' ');
  WriteLn('Status');
  WriteLn(line);
  Write(Code); Write(pref:9); Write(Name:5); Write(Age:7); Write(sexf:8); 
  for i := 0 to x do
    Write(' ');
  WriteLn(statf);
  WriteLn(line);
end.