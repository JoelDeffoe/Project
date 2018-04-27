using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows;
using System.Windows.Controls;
using System.Windows.Data;
using System.Windows.Documents;
using System.Windows.Input;
using System.Windows.Media;
using System.Windows.Media.Imaging;
using System.Windows.Navigation;
using System.Windows.Shapes;

namespace demo2thrVers
{
    class SalaryCalculator
    {
        const double BIGGEST_TAX = 0.6;
        const double BIG_TAX = 0.7;
        const double MEDIUM_TAX = 0.8;
        const double SMALL_TAX = 0.9;

        private int mHours;
        private double mWage;

        public SalaryCalculator(int pHours, double pWage)
        {
            mHours = pHours;
            mWage = pWage;
        }

        public double calculateSalary()
        {
            double salary = mHours * mWage;

            applyTax(ref salary);

            return salary;
        }

        private void applyTax(ref double salary)
        {
            if (salary >= 1600)
            {
                salary *= BIGGEST_TAX;
            }
            else if (salary < 1600 && salary >= 1200)
            {
                salary *= BIG_TAX;
            }
            else if (salary < 1200 && salary >= 900)
            {
                salary *= MEDIUM_TAX;
            }
            else
            {
                salary *= SMALL_TAX;
            }
        }
    }
}