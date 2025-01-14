program v1whiledo;
uses
  crt;
var
  score : Integer;
  exitLoop : Boolean = False;
  i : Integer;
begin
  ClrScr;
  // Check Input Scores
  repeat
    Write('Input Scores : ');
    ReadLn(score);

    for i := 1 to 1 do
    begin
      if (score >= 0) and (score <= 100) then
      begin
        if (score >= 80) then
        begin
          WriteLn('A')
        end
        else if score >= 75 then
        begin
          WriteLn('B+')
        end
        else if score >= 70 then
        begin
          WriteLn('B')
        end
        else if score >= 65 then
        begin
          WriteLn('C+')
        end
        else if score >= 60 then
        begin
          WriteLn('C')
        end
        else if score >= 55 then
        begin
          WriteLn('D+')
        end
        else if score >= 50 then
        begin
          WriteLn('D')
        end
        else if score >= 0 then
        begin
          WriteLn('F')
        end;
        Break
      end
      else
        if score <> 999 then
        begin
          WriteLn('Input Score out of Range.');
          Break
        end
        else
          Break
    end;

    if score = 999 then
    begin
      exitLoop := True;
      WriteLn('Exit Program!')
    end;

  until (False or exitLoop);
end.