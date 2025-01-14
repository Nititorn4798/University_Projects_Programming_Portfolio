using System;

class GradeProgram
{
    // ตัวแปรเก็บคะแนน
    private int _score;

    // เมธอดสำหรับการรับคะแนนจากผู้ใช้
    public void GetScore()
    {
        Console.Write("Enter Your Score (0-100) >> ");
        _score = Convert.ToInt32(Console.ReadLine());
    }

    // เมธอดสำหรับการคำนวณเกรดจากคะแนน
    public string CalculateGrade()
    {
        if (_score >= 80)
        {
            return "You Got Grade A!";
        }
        else if (_score >= 70)
        {
            return "You Got Grade B!";
        }
        else if (_score >= 60)
        {
            return "You Got Grade C!";
        }
        else if (_score >= 50)
        {
            return "You Got Grade D!";
        }
        else if (_score >= 0)
        {
            return "You Got Grade F!";
        }
        else
        {
            return "Invalid score! Please enter a score between 0 and 100.";
        }
    }

    // เมธอดสำหรับการแสดงผลเกรด
    public void DisplayGrade()
    {
        Console.WriteLine(CalculateGrade());
    }

    // เมธอดสำหรับการเริ่มโปรแกรม
    public void Start()
    {
        Console.WriteLine("Grade Program");
        Console.WriteLine("--------------------");

        while (_score >= 0 && _score <= 100)
        {
            GetScore();  // รับคะแนนจากผู้ใช้
            DisplayGrade();  // แสดงผลลัพธ์เกรด
            Console.WriteLine("--------------------");
        }

        Console.WriteLine("Program ended.");
    }
}

class Program
{
    static void Main(string[] args)
    {
        // สร้างอ็อบเจ็กต์จากคลาส GradeProgram
        GradeProgram gradeProgram = new GradeProgram();

        // เริ่มโปรแกรม
        gradeProgram.Start();
    }
}