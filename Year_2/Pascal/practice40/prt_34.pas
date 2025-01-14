program prt_34;
uses
  crt;
var
  score : Real;
  stdScore : Real = 0;
  i : Integer = 0;
begin
  ClrScr;
  repeat
    Write('Please enter your student s score. [',i+1,'/10] : ');
    ReadLn(score);
    if (score >= 0) and (score <= 50) then
    begin
      stdScore := stdScore + score;
      i := i + 1;
    end
    else
      WriteLn('Score must be between 0-50.');
  until (i = 10);
  stdScore := stdScore / i;
  WriteLn('The average score of all 10 students is ',stdScore:0:2);
  ReadLn;
end.