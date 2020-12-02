using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace Yoctopuce
{
    static class Program
    {
        /// <summary>
        /// Point d'entrée principal de l'application.
        /// </summary>
        [STAThread]
        static void Main()
        {
            Application.EnableVisualStyles();
            Application.SetCompatibleTextRenderingDefault(false);
            string errsmg = "";
            if (YAPI.RegisterHub("usb", ref errsmg) == YAPI.SUCCESS)
                Application.Run(new Main());
            else
                MessageBox.Show("Init error:" + errsmg);
        }
    }
}
