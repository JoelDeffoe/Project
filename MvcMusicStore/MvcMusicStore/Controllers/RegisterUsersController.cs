using System;
using System.Collections.Generic;
using System.Data;
using System.Data.Entity;
using System.Linq;
using System.Net;
using System.Web;
using System.Web.Mvc;
using MvcMusicStore.Models;
using System.Web.Security;

namespace MvcMusicStore.Controllers
{
    public class RegisterUsersController : Controller
    {
        private MusicStoreEntities db = new MusicStoreEntities();

        // GET: RegisterUsers
        public ActionResult Index()
        {
            return View(db.Users.ToList());
        }
        public ActionResult deleteAllUsers()
        {
            var users = Membership.GetAllUsers();

            var userList = new List<MembershipUser>();
            foreach (MembershipUser user in users)
            {
                if (user.ToString() != "Administrator")
                {
                    Membership.DeleteUser(user.ToString());
                }
                userList.Add(user);
            }
            ViewBag.LIST = userList;

            return View();
        }

        // GET: RegisterUsers/Details/5
        public ActionResult Details(int? id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            RegisterUser registerUser = db.Users.Find(id);
            if (registerUser == null)
            {
                return HttpNotFound();
            }
            return View(registerUser);
        }

        // GET: RegisterUsers/Create
        public ActionResult Create()
        {
            return View();
        }

        // POST: RegisterUsers/Create
        // To protect from overposting attacks, please enable the specific properties you want to bind to, for 
        // more details see https://go.microsoft.com/fwlink/?LinkId=317598.
        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult Create([Bind(Include = "Id,UserName,Email,Password,ConfirmPassword")] RegisterUser registerUser)
        {
            if (ModelState.IsValid)
            {
                db.Users.Add(registerUser);
                db.SaveChanges();
                return RedirectToAction("Index");
            }

            return View(registerUser);
        }

        // GET: RegisterUsers/Edit/5
        public ActionResult Edit(int? id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            RegisterUser registerUser = db.Users.Find(id);
            if (registerUser == null)
            {
                return HttpNotFound();
            }
            return View(registerUser);
        }

        // POST: RegisterUsers/Edit/5
        // To protect from overposting attacks, please enable the specific properties you want to bind to, for 
        // more details see https://go.microsoft.com/fwlink/?LinkId=317598.
        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult Edit([Bind(Include = "Id,UserName,Email,Password,ConfirmPassword")] RegisterUser registerUser)
        {
            if (ModelState.IsValid)
            {
                db.Entry(registerUser).State = System.Data.Entity.EntityState.Modified;
                db.SaveChanges();
                return RedirectToAction("Index");
            }
            return View(registerUser);
        }

        // GET: RegisterUsers/Delete/5
        public ActionResult Delete(int? id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            RegisterUser registerUser = db.Users.Find(id);
            if (registerUser == null)
            {
                return HttpNotFound();
            }
            return View(registerUser);
        }

        // POST: RegisterUsers/Delete/5
        [HttpPost, ActionName("Delete")]
        [ValidateAntiForgeryToken]
        public ActionResult DeleteConfirmed(int id)
        {
            RegisterUser registerUser = db.Users.Find(id);
            db.Users.Remove(registerUser);
            db.SaveChanges();
            return RedirectToAction("Index");
        }

        protected override void Dispose(bool disposing)
        {
            if (disposing)
            {
                db.Dispose();
            }
            base.Dispose(disposing);
        }
    }
}
