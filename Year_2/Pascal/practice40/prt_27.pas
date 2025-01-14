program prt_27;
uses
  crt;
var
  Mid_Scores, Final_Scores, Total_Scores : Real;
  std_code, std_name : String ;
begin
  ClrScr;
  Write('Input Your Student Code : ');
  ReadLn(std_code);
  Write('Input Your Student Name : ');
  ReadLn(std_name);
  Write('Input Your Scores Mid : ');
  ReadLn(Mid_Scores);
  Write('Input Your Scores Final : ');
  ReadLn(Final_Scores);
  Total_Scores := Mid_Scores + Final_Scores;
  if (Total_Scores <= 100) and (Total_Scores >= 80) then
  begin
    WriteLn('A')
  end
  else if (Total_Scores <= 79) and (Total_Scores >= 70) then
  begin
    WriteLn('B')
  end
  else if (Total_Scores <= 69) and (Total_Scores >= 60) then
  begin
    WriteLn('C')
  end
  else if (Total_Scores <= 59) and (Total_Scores >= 50) then
  begin
    WriteLn('D')
  end
  else if (Total_Scores <= 49) and (Total_Scores >= 0) then
  begin
    WriteLn('E')
  end
  else
  begin
    WriteLn('Input Out Of Range!')
  end;
  ReadLn;
end.