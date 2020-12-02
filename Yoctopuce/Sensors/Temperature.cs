// File: Yoctopuce\Sensors\Temperature.cs
// Date: 2020-12-02
// Authors: STAHLI Jules,
// Version: 1.0

using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using Yoctopuce.Exceptions;

namespace Yoctopuce.Sensors
{
    public class Temperature
    {
        // Fields

        private YTemperature sensor;
        private int hardwaredetect;

        // Properties

        public bool IsOnline
        {
            get => sensor != null && sensor.isOnline();
        }

        public double Value
        {
            get => !IsOnline ? -1 : sensor.get_currentValue();
        }

        public string Unit
        {
            get => !IsOnline ? string.Empty : sensor.get_unit();
        }

        // Constructors

        public Temperature()
        {
            hardwaredetect = 0;
            sensor = GetSensor();
        }

        // Methods

        /// <summary>
        /// Get sensor
        /// </summary>
        /// <returns></returns>
        private YTemperature GetSensor()
        {
            string errmsg = "";
            if (hardwaredetect == 0) YAPI.UpdateDeviceList(ref errmsg);
            hardwaredetect = (hardwaredetect + 1) % 20;
            YAPI.HandleEvents(ref errmsg);
            YTemperature sensor = YTemperature.FirstTemperature();
            if (sensor is null)
            {
                throw new SensorNotDetectedException();
            }
            else if (!sensor.isOnline())
            {
                throw new SensorOfflineException();
            }
            else
            {
                return sensor;
            }
        }

        /// <summary>
        /// Get sensor value as string
        /// </summary>
        /// <returns></returns>
        public override string ToString()
        {
            return IsOnline ? $"{Value} {Unit}" : "Sensor is offline";
        }
    }
}
