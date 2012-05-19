from django.db import models
from PIL import Image

class ImageSubmit(models.Model):
	img = models.ImageField(upload_to='images')
	title = models.CharField(max_length=100)
	desc = models.CharField(max_length=500)
	tag = models.CharField(max_length=100)

	def __unicode__(self):
		return self.title

	def save(self):
		
		if not self.id and not self.img:
			return

		super(ImageSubmit, self).save()

		filename = self.get_source_filename()
		image = Image.open(filename)
		
		imgh = image.height
		imgv = image.width
		ratio = float(imgh/600)

		if imgh > 600:
			imgh=600
			imgv=imgv/ratio

			size=(imgh, imgv)

			image.thumbnail(size, Image.ANTIALIAS)
		
		image.save(filename)
