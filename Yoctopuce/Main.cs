using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using Yoctopuce.Sensors;

namespace Yoctopuce
{
    public partial class Main : Form
    {
        public Main()
        {
            InitializeComponent();

            // Test
            Temperature temperatureSensor = new Temperature();
            Console.WriteLine(temperatureSensor.ToString());
        }
    }
}
